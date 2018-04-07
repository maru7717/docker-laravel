<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{

    /**
     * create()やupdate()で入力させない ブラックリスト
     */
    protected $guarded = [
        'created_at'
    ];

    //
    public function movies()
    {
        return $this->hasMany('App\Movie');
    }

    public function lord1()
    {
        return $this->hasOne('App\Lord', 'id', 'lord_id1');
    }

    public function lord2()
    {
        return $this->hasOne('App\Lord', 'id', 'lord_id2');
    }

    public function lord3()
    {
        return $this->hasOne('App\Lord', 'id', 'lord_id3');
    }

    public function lord4()
    {
        return $this->hasOne('App\Lord', 'id', 'lord_id4');
    }

    public function lord5()
    {
        return $this->hasOne('App\Lord', 'id', 'lord_id5');
    }

    public function lord6()
    {
        return $this->hasOne('App\Lord', 'id', 'lord_id6');
    }

    public function lord7()
    {
        return $this->hasOne('App\Lord', 'id', 'lord_id7');
    }

    public function lord8()
    {
        return $this->hasOne('App\Lord', 'id', 'lord_id8');
    }

    public function player1()
    {
        return $this->hasOne('App\Player', 'id', 'player_id1');
    }

    public function player2()
    {
        return $this->hasOne('App\Player', 'id', 'player_id2');
    }

    public function player3()
    {
        return $this->hasOne('App\Player', 'id', 'player_id3');
    }

    public function player4()
    {
        return $this->hasOne('App\Player', 'id', 'player_id4');
    }

    public function player5()
    {
        return $this->hasOne('App\Player', 'id', 'player_id5');
    }

    public function player6()
    {
        return $this->hasOne('App\Player', 'id', 'player_id6');
    }

    public function player7()
    {
        return $this->hasOne('App\Player', 'id', 'player_id7');
    }

    public function player8()
    {
        return $this->hasOne('App\Player', 'id', 'player_id8');
    }

    public function players()
    {
        $p1 = $this->getPlayer($this->lord1, $this->player1);
        $p2 = $this->getPlayer($this->lord2, $this->player2);
        $p3 = $this->getPlayer($this->lord3, $this->player3);
        $p4 = $this->getPlayer($this->lord4, $this->player4);
        $p5 = $this->getPlayer($this->lord5, $this->player5);
        $p6 = $this->getPlayer($this->lord6, $this->player6);
        $p7 = $this->getPlayer($this->lord7, $this->player7);
        $p8 = $this->getPlayer($this->lord8, $this->player8);
        return $p1 . $p2 . $p3 . $p4 . PHP_EOL . 'vs' . PHP_EOL . $p5 . $p6 . $p7 . $p8;
    }

    public function team1()
    {
        $p1 = $this->getPlayer($this->lord1, $this->player1);
        $p2 = $this->getPlayer($this->lord2, $this->player2);
        $p3 = $this->getPlayer($this->lord3, $this->player3);
        $p4 = $this->getPlayer($this->lord4, $this->player4);
        return $p1 . $p2 . $p3 . $p4;
    }

    public function team2()
    {
        $p5 = $this->getPlayer($this->lord5, $this->player5);
        $p6 = $this->getPlayer($this->lord6, $this->player6);
        $p7 = $this->getPlayer($this->lord7, $this->player7);
        $p8 = $this->getPlayer($this->lord8, $this->player8);
        return $p5 . $p6 . $p7 . $p8;
    }

    private function getPlayer($lord, $player)
    {
        if (is_null($lord)) {
            return '';
        }
        if (is_null($player)) {
            $plyerName = '不明';
        } else {
            $plyerName = $player['chocoa_real_name'];
        }

        return $lord['name'] . "({$plyerName}） ";
    }
}
