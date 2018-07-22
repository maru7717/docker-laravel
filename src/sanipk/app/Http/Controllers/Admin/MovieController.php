<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Movie;
use App\Player;
use Carbon\Carbon;
use DateTimeZone;
use Google_Client;
use Google_Service_YouTube;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);


        $movies->each(function ($item) {
              $dt = new Carbon($item->published_at);
              $dt->addHour(9);
              $item->published_at_tokyo = $dt->format('Y-m-d H:i');
        });

        return view('movies.index', compact('movies'));
    }

    public function get()
    {
        $distributors = Player::whereNotNull('youtube_channel')->get();
        $toDay = today();
        $fromDay = Carbon::parse('- 6 month');

        return view('movies.get', compact('distributors', 'toDay', 'fromDay'));
    }

    public function store(Request $request)
    {
        $distributors = Player::whereIn('id', $request->distributor)->get();
        $fromDay = $request->from_year . '-'
            . substr('0' . $request->from_month, -2) . '-'
            . $request->from_day
            . 'T00:00:00Z';
        $toDay = $request->to_year . '-'
            . substr('0' . $request->to_month, -2) . '-'
            . $request->to_day
            . 'T00:00:00Z';

        $message = '';

        $client = new Google_Client();
        $client->setDeveloperKey('AIzaSyCqqfx8bae7nRK48IO1HD204pHA_rmYmuw');
        $youtube = new Google_Service_YouTube($client);

        foreach ($distributors as $distributor) {

            $playerId = $distributor->id;
            $channelId = $distributor->youtube_channel;

            // 取得データ保存用
            $videos = [];

            // チャンネルＩＤからビデオＩＤを取得する
            $searchResponse = $youtube->search->listSearch('snippet', array(
                'channelId' => $channelId,
                'order' => 'date',
                'maxResults' => 50,
                'publishedBefore' => $toDay,
                'publishedAfter' => $fromDay,
            ));
            foreach ($searchResponse as $response) {
                $videoId = $response->id->videoId;
                $videos[$videoId] = [
                    'video_id' => $videoId,
                    'published_at' => $response->snippet->publishedAt,
                    'thumbnail_url' => $response->snippet->thumbnails->high->url,
                ];
            }

            $videoResponse = $youtube->videos->listVideos(
                'contentDetails',
                array('id' => implode(',', array_keys($videos)))
            );
            foreach ($videoResponse as $response) {
                $videos[$response->id]['duration'] = $response->contentDetails->duration;
            }

            foreach ($videos as $videoId => $val) {
                $movie = Movie::firstOrNew(['video_id' => $videoId]);
                $movie->channel_id = $channelId;
                $movie->published_at = date_create($val['published_at'], new DateTimeZone('Asia/Tokyo)'));
                $movie->duration = array_key_exists('duration', $val) ? $val['duration'] : '';
                $movie->thumbnail_url = array_key_exists('thumbnail_url', $val) ? $val['thumbnail_url'] : '';
                $movie->player_id = $playerId;
                $movie->save();
            }

            $message .= ($message)? ', ' : '';
            $message .= $distributor->chocoa_real_name . "さんの動画を " . count($videos) . " 件 ";
        }
        return redirect('admin/movies')->with('flash_message', $message . '取得しました。');

    }

//     public function update()
//     {
//         $client = new Google_Client();
//         $client->setDeveloperKey('AIzaSyCqqfx8bae7nRK48IO1HD204pHA_rmYmuw');
//         $youtube = new Google_Service_YouTube($client);

// //         $playerId = 2;
// //         $channelId = 'UCjSIr3TpjcXbXdvziSYmpww';

//         $distributors = Player::whereNotNull('youtube_channel')->get();
//         foreach ($distributors as $distributor) {

//             $playerId = $distributor->id;
//             $channelId = $distributor->youtube_channel;

//             // チャンネルＩＤからビデオＩＤを取得する
//             $searchResponse = $youtube->search->listSearch('snippet', array(
//                 'channelId' => $channelId,
//                 'order' => 'date',
//                 'maxResults' => 50,
//                 'publishedBefore' => '2016-09-15T00:00:00Z',
//             ));

//             $videos = [];
//             foreach ($searchResponse as $response) {
//                 $videoId = $response->id->videoId;
//                 $videos[$videoId] = [
//                     'video_id' => $videoId
//                 ];
//                 $videos[$videoId]['published_at'] = $response->snippet->publishedAt;
//             }

//             $videoResponse = $youtube->videos->listVideos('contentDetails', array(
//                 'id' => implode(',', array_keys($videos))
//             ));
//             foreach ($videoResponse as $response) {
//                 $videos[$response->id]['duration'] = $response->contentDetails->duration;
//             }

//             foreach ($videos as $videoId => $val) {
//                 $movie = Movie::firstOrNew([
//                     'video_id' => $videoId
//                 ]);
//                 $movie->channel_id = $channelId;
//                 $movie->published_at = date_create($val['published_at'], new DateTimeZone('Asia/Tokyo)'));
//                 $movie->duration = array_key_exists('duration', $val) ? $val['duration'] : '';
//                 $movie->player_id = $playerId;
//                 $movie->save();
//             }
//             var_dump(count($videos));
//         }
//     }
}
