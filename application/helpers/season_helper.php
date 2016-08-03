<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('season_test'))
{
function season_test(){
        $date = date("m");
            if ($date >= 6 && $date <= 8) {
                echo "<div class='alert alert-success' id='success-alert'>
                    <button type='button' class='close' data-dismiss='alert'>x</button>";
                echo "Welcome! Its summer season!";
                echo "</div> ";
            }
            elseif ($date >= 3 && $date <= 5) {
                echo "<div class='alert alert-success' id='success-alert'>
                    <button type='button' class='close' data-dismiss='alert'>x</button>";
                echo "Welcome! Its spring season!";
                echo "</div> ";
            }
            elseif ($date >= 9 && $date <= 11) {
                 echo "<div class='alert alert-success' id='success-alert'>
                    <button type='button' class='close' data-dismiss='alert'>x</button>";
                echo "Welcome! Its fall season!";
                echo "</div> ";
            }
            elseif ($date >= 1 && $date <= 2 && $date == 12) {
                echo "<div class='alert alert-success' id='success-alert'>
                    <button type='button' class='close' data-dismiss='alert'>x</button>";
                echo "Welcome! Its winter season!";
                echo "</div> ";
            }else { 
                 echo "<div class='alert alert-success' id='success-alert'>
                    <button type='button' class='close' data-dismiss='alert'>x</button>";
                echo "not included"; 
                echo "</div> ";
            }
        }

            // switch ($date) {
            //     case '1':
            //         echo " Welcome! Its Winter season!";
            //         break;
            //     case '2':
            //         echo "Welcome! Its Winter season!";
            //         break;
            //     case '3':
            //         echo "Welcome! Its Spring season!";
            //         break;
            //     case '4':
            //         echo "Welcome! Its Spring season!";
            //         break;
            //     case '5':
            //         echo "Welcome! Its Spring season!";
            //         break;
            //     case '6':
            //         echo "Welcome! Its Summer season!";
            //         break;
            //     case '7':
            //         echo "Welcome! Its Summer season!";
            //         break;
            //     case '8':
            //         echo "Welcome! Its Summer season!";
            //         break;
            //     case '9':
            //         echo "Welcome! Its Fall season!";
            //         break;
            //     case '10':
            //         echo "Welcome! Its Fall season!";
            //         break;
            //     case '11':
            //         echo "Welcome! Its Fall season!";
            //         break;
            //     case '12':
            //         echo "Welcome! Its Winter season!";
            //         break;
            //     default:
            //         echo "end";
            //         break;
            // }
        }