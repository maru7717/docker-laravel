<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTimeZone;
use Google_Client;
use Google_Service_YouTube;
use App\Player;
use App\Movie;

class MovieController extends Controller
{

    //
    public function update()
    {
        $client = new Google_Client();
        $client->setDeveloperKey('AIzaSyCqqfx8bae7nRK48IO1HD204pHA_rmYmuw');
        $youtube = new Google_Service_YouTube($client);

//         $playerId = 2;
//         $channelId = 'UCjSIr3TpjcXbXdvziSYmpww';

        $distributors = Player::whereNotNull('youtube_channel')->get();
        foreach ($distributors as $distributor) {

            $playerId = $distributor->id;
            $channelId = $distributor->youtube_channel;

            // チャンネルＩＤからビデオＩＤを取得する
            $searchResponse = $youtube->search->listSearch('snippet', array(
                'channelId' => $channelId,
                'order' => 'date',
                'maxResults' => 50,
                'publishedBefore' => '2016-09-15T00:00:00Z',
            ));

            $videos = [];
            foreach ($searchResponse as $response) {
                $videoId = $response->id->videoId;
                $videos[$videoId] = [
                    'video_id' => $videoId
                ];
                $videos[$videoId]['published_at'] = $response->snippet->publishedAt;
            }

            $videoResponse = $youtube->videos->listVideos('contentDetails', array(
                'id' => implode(',', array_keys($videos))
            ));
            foreach ($videoResponse as $response) {
                $videos[$response->id]['duration'] = $response->contentDetails->duration;
            }

            foreach ($videos as $videoId => $val) {
                $movie = Movie::firstOrNew([
                    'video_id' => $videoId
                ]);
                $movie->channel_id = $channelId;
                $movie->published_at = date_create($val['published_at'], new DateTimeZone('Asia/Tokyo)'));
                $movie->duration = array_key_exists('duration', $val) ? $val['duration'] : '';
                $movie->player_id = $playerId;
                $movie->save();
            }
            var_dump(count($videos));
        }
    }
}
