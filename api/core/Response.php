<?php

namespace Core;

class Response
{
    /**
     * Set status code if it is valid.
     * 
     * @param   int     $statusCode
     * @return  object  this response object.
     */
    public function status($statusCode = 200)
    {
        if ($this->isValid($statusCode)) {
            http_response_code($statusCode);
            return $this;
        } else {
            exit('Invalid status code!');
        }
    }

    /**
     * Check if status code is valid.
     * 
     * @param   int     $statusCode
     * @return  bool    true if status code is valid, false otherwise
     */
    public function isValid($statusCode)
    {
        return $statusCode >= 100 && $statusCode < 600;
    }

    /**
     * Create JSON format for response content.
     * 
     * @param   int     $success 1 if successful, 0 otherwise
     * @param   array   $data
     * @param   string  $message
     * @return  string  response JSON
     */
    public function json($success = 1, $data = [], $message = '')
    {
        return json_encode([
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
