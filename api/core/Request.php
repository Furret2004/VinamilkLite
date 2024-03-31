<?php

namespace Core;

class Request
{
    /**
     * Get params from request. 
     * 
     * @return  array
     */
    public function params($key = '')
    {
        if ($key != '') {
            return isset($_GET[$key]) ? $this->clean($_GET[$key]) : null;
        }

        return  $this->clean($_GET);
    }

    /**
     * Get body from request. 
     * 
     * @return  array
     */
    public function body($key = '')
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($key != '') {
            return isset($data[$key]) ? $this->clean($data[$key]) : null;
        }

        return $this->clean($data);
    }

    /**
     * Get value for server super global var.
     *
     * @param   string  $key
     * @return  string
     */
    public function server($key = '')
    {
        return isset($_SERVER[strtoupper($key)])
            ? $this->clean($_SERVER[strtoupper($key)])
            : $this->clean($_SERVER);
    }

    /**
     * Get request method.
     *
     * @return  string
     */
    public function getMethod()
    {
        return strtoupper($this->server('REQUEST_METHOD'));
    }

    /**
     *  Returns the client IP addresses.
     *
     * @return string
     */
    public function getClientIp()
    {
        return $this->server('REMOTE_ADDR');
    }

    /**
     *  Get server URI.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->server('REQUEST_URI');
    }

    /**
     * The clean function is used to sanitize input data.
     *
     * @param   mixed   $data
     * @return  mixed
     */
    private function clean($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                unset($data[$key]);
                $data[$this->clean($key)] = $this->clean($value);
            }
        } else {
            $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
        }

        return $data;
    }
}
