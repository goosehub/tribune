<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class youtube extends CI_Model
{
    public $json_folder;

    function __construct()
    {
        parent::__construct();
    }

    function random_youtube_id()
    {
        $youtube_ids = $this->youtube_ids();
        return $youtube_ids[array_rand($youtube_ids)];
    }

    function youtube_ids()
    {
        return [
            'S_Rk6ZdKV9A',
            '7EDLYgG5ZlI',
            'USWV-lq0mzY',
            'R6vjE9tJBhI',
            'i4Auxzgi1jg',
            'bR-3Zd4cOzE',
            '6AV_CvFsRjM',
            'jm0r7JP1p-A',
            'tQWZzU2cPZU',
            'fZX9XIP6dls',
            'lpw5mmPlk-A',
            'aBRcykiEf1g',
            'rSR4Ju4o9No',
            'WYxi1wEG7nA',
            'vLCnLLMijGg',
            'kI0450qOa6M',
            'iJ--1PLPnA8',
            'eeBvJwqe4Pg',
            'l1hTcTQIoE8',
            '3oIpe4LLV6A',
            'cyKIC5A6WpU',
            'Z3RHztObwb0',
            'K0Bl7lAMmjQ',
            'RzHLGJCRSPw',
            'bAv2fjc6E5g',
            'TmrKhNeOUkQ',
            '-bAj3OsNwd4',
            'pGTmMHxZ7sw',
            'n8baYBgmvrY',
            'FRUE2XJmaNA',
            't1LC0HpgloI',
            'mH-EBkXBy7c',
            'jvUKQL07DFY',
            'gooQIJMBX3c',
        ];
    }

}
?>
