<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ClickMeeting\Entity;

/**
 * Description of Conference
 *
 * @author Alexis J. Rosa Rivera <alexisjrosarivera@gmail.com>
 */
class Conference extends EntityAbstract {
    
    public function getConference() {
        
        return $this->client->conference($this->room_id);
        
    }
    public function getConferences($status = 'active', $page = 1) {
        
        return $this->client->conferences($status, $page);
        
    }
      /**
     * Add conference
     * @param array $params
     */
    public function createConference(array $params)
    {
        return $this->client->addConference($params);
    }
    /**
     * Edit conference
     * @param int $room_id
     * @param array $params
     */
    public function editConference( array $params)
    {
        return $this->client->editConference($this->room_id, $params);
    }
    /**
     * Delete conference
     * @param int $room_id
     */
    public function deleteConference()
    {
        return $this->client->deleteConferenceRecordings($this->room_id);
    }
    
    
  
    /**
     * Conference skins
     * @param int $room_id
     * @param string $lang
     * @param array $params
     * @return Ambigous <string, multitype:, mixed>
     */
    public function conferenceSkins()
    {
        return $this->client->conferenceSkins();
    }
    
    
     /**
     * Get coference file library
     * @param int $room_id
     */
    public function conferenceFileLibrary()
    {
        return $this->client->conferenceFileLibrary($this->room_id);
    }
 
 
    
    
}
