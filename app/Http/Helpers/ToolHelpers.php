<?php

namespace App\Http\Helpers;

class ToolHelpers
{
    public static function getGlobalStatus(int $type, $data)
    {
        if($type === 1)
        {
            $loginServer = $data["login"]["status"];
            return $loginServer === "online" ? 2 : 0;
        }
        if ($type === 2)
        {
            $up_count = 0;
            $down_count = 0;

            $charServer = $data["char"]["chaos"];
            foreach ($charServer as $char)
            {
                if($char["status"] === "online")
                {
                    $up_count = $up_count + 1;
                }
                if($char["status"] === "offline")
                {
                    $down_count = $down_count + 1;
                }
            }

            return count($charServer) === $up_count ? 2 : ( count($charServer) === $down_count ? 1 : 0 );
        }
        if($type === 3)
        {
            $up_count = 0;
            $down_count = 0;

            $mapServer = $data["map"]["chaos"];
            foreach ($mapServer as $mapSv)
            {
                if($mapSv["status"] === "online")
                {
                    $up_count = $up_count + 1;
                }
                if($mapSv["status"] === "offline")
                {
                    $down_count = $down_count + 1;
                }
            }

            return count($mapServer) === $up_count ? 2 : ( count($mapServer) === $down_count ? 1 : 0 );
        }
    }

    public static function getServerStatus(string $status)
    {
        if($status === "online")
        {
            return 2;
        }
        else
        {
            return 0;
        }
    }
}