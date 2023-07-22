<?php
class Sport extends CI_Model {
    function get_all_athletes()
    {
        return $this->db->query("SELECT athlete_name, gender, sports.sport_name
        FROM athletes
        LEFT JOIN sports
        ON athletes.sports_sport_id = sports.sport_id")->result_array();
    }

    function get_filtered_athletes($gender, $sport)
    {
        if($gender == NULL) {
            $gender = array('Male', 'Female');
        } 
        if ($sport == NULL) {
            $query = "SELECT athlete_name, gender, sports.sport_name
            FROM athletes
            LEFT JOIN sports ON athletes.sports_sport_id = sports.sport_id
            WHERE gender IN ?";
            $values =  array($gender);
            return $this->db->query($query, $values)->result_array();
        }
        $query = "SELECT athlete_name, gender, sports.sport_name
            FROM athletes
            LEFT JOIN sports ON athletes.sports_sport_id = sports.sport_id
            WHERE sports.sport_name IN ? AND gender IN ?";
        $values =  array($sport, $gender);
        return $this->db->query($query, $values)->result_array();
        /*
        else 
        {
            if (count($filter['level']) == 1 ) 
            {
                $query = "SELECT assignment, sequence_num, level, track FROM assignments WHERE level = ? AND track = ?";
                $values = array($filter['level'], $filter['track']);
                return $this->db->query($query, $values)->result_array();
            } 

            else if (count($filter['level'])) 
            {
                return $this->db->query("SELECT assignment, sequence_num, level, track FROM assignments WHERE track = ?", array($filter['track']))->result_array();
            }
        }*/
    }

    function get_athlete($athlete)
    {
        return $this->db->query(
            "SELECT athlete_name, gender, sports.sport_name
            FROM athletes
            LEFT JOIN sports ON athletes.sports_sport_id = sports.sport_id
            WHERE athlete_name = ?", array($athlete)
            )->row_array();
    }
}
?>