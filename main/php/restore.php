<?php
 function restoreMysqlDB($filePath, $conn)
                {
                    $sql = '';
                    $error = '';

                    if (file_exists($filePath)) {
                        $lines = file($filePath);

                        foreach ($lines as $line) {

                            // Ignoring comments from the SQL script
                            if (substr($line, 0, 2) == '--' || $line == '') {
                                continue;
                            }

                            $sql .= $line;

                            if (substr(trim($line), - 1, 1) == ';') {
                                $result = mysqli_query($conn, $sql);
                                if (! $result) {
                                    $error .= mysqli_error($conn) . "\n";
                                }
                                $sql = '';
                            }
                        } // end foreach

                        if ($error) {
                            $response = array(
                                "type" => "error",
                                "message" => $error
                            );
                        } else {
                            $response = array(
                                "type" => "success",
                                "message" => "Database Restore Completed Successfully."
                            );
                        }
                    } // end if file exists
                    return $response;
                }
                restoreMysqlDB($filePath,$conn);
?>