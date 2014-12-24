<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
    
/*
 * -------------------------------
 * PASSWORD GENERATOR
 * -------------------------------
 * by Vincent Polding
 * contact: http://www.poldings.com
 * demo site: http://password-generator.poldings.com
 * 20th Dec 2014
 */

class Generator_model extends CI_Model
{
    
    /*
     * GET ADJECTIVE
     * selects random adjective
     * obfuscates vowels (a/4, e/3, i/1, o/0, u/7)
     */
    public function get_adjective()
    {
        // get all words
        $this->db->select('value');
        $this->db->order_by('value', 'RANDOM');
        $this->db->limit('1');
        $query = $this->db->get('adjectives');
        
        // if more than 0 results
        if ($query->num_rows() == 1) {
            
            // get results
            $word = $query->result();
            foreach ($word as $row) {
                $word = $row->value;
            }
            
            // set noun
            $data['adjective'] = $word;
            
            // replace vowels
            $vowels = array(
                'a',
                'e',
                'i',
                'o',
                'u'
            );
            $numbers = array(
                '4',
                '3',
                '1',
                '0',
                '7'
            );
            $word = str_replace($vowels, $numbers, $word);
            
            // make uppercase
            $data['adjective_new'] = strtoupper($word);
            
            // return data
            return $data;
        }
    }
    
    /*
     * GET NOUN
     * selects random noun
     * obfuscates vowels (a/4, e/3, i/1, o/0, u/7)
     */
    public function get_noun()
    {
        // get all words
        $this->db->select('value');
        $this->db->order_by('value', 'RANDOM');
        $this->db->limit('1');
        $query = $this->db->get('nouns');
        
        // if more than 0 results
        if ($query->num_rows() == 1) {
            
            // get results
            $result = $query->result();
            foreach ($result as $row) {
                $word = $row->value;
            }
            
            // set noun
            $data['noun'] = $word;
            
            // replace vowels
            $vowels = array(
                'a',
                'e',
                'i',
                'o',
                'u'
            );
            $numbers = array(
                '4',
                '3',
                '1',
                '0',
                '7'
            );
            $data['noun_new'] = str_replace($vowels, $numbers, $word);
            
            // return data
            return $data;
        }
    }
}