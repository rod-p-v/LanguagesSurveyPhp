<?php 

include 'db.php';

class survey extends DB{

private $totalVotes;
private $optionSelected;

    public function setOptionSelected($option){
    $this->optionSelected = $option;
    }

    public function getOptionSelected(){
    return $this->optionSelected;
    }

    public function vote(){
    $query=$this->connect()->prepare('UPDATE languages SET votes = votes+1 WHERE opcion = :opcion');
    $query->execute(['opcion' => $this->optionSelected]);
    }

    public function showResults(){
        return $this->connect()->query('SELECT * FROM languages');
    }

    public function getTotalVotes(){
        $query= $this->connect()->query('SELECT SUM(votes) AS Total_votes FROM languages');
        $this->totalVotes = $query->fetch(PDO::FETCH_OBJ)->Total_votes;
        return $this->totalVotes;
    }

    public function getPorcentageVotes($votes){
        return round(($votes / $this->totalVotes)*100, 0);
    }
}

?>