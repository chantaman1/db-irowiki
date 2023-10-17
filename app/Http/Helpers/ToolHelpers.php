<?php

namespace App\Http\Helpers;

class ToolHelpers
{
    public static function getGlobalStatus(int $type, $data)
    {
        if($type === 1)
        {
            $loginServer = $data["Login"]["Status"];
            return $loginServer === "Online" ? 2 : 0;
        }
        if ($type === 2)
        {
            $up_count = 0;
            $down_count = 0;

            $charServer = $data["Char"]["Chaos"];
            foreach ($charServer as $char)
            {
                if($char["Status"] === "Online")
                {
                    $up_count = $up_count + 1;
                }
                if($char["Status"] === "Offline")
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

            $mapServer = $data["Map"]["Chaos"];
            foreach ($mapServer as $mapSv)
            {
                if($mapSv["Status"] === "Online")
                {
                    $up_count = $up_count + 1;
                }
                if($mapSv["Status"] === "Offline")
                {
                    $down_count = $down_count + 1;
                }
            }

            return count($mapServer) === $up_count ? 2 : ( count($mapServer) === $down_count ? 1 : 0 );
        }
    }

    public static function getServerStatus(string $status)
    {
        error_log($status);
        if($status === "Online")
        {
            return 2;
        }
        else
        {
            return 0;
        }
    }
}