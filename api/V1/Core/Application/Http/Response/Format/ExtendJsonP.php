<?php

namespace Api\V1\Core\Application\Http\Response\Format;


use Dingo\Api\Http\Response\Format\Jsonp;

class ExtendJsonP extends Jsonp
{
    /**
     * Encode the content to its JsonP representation.
     *
     * @param mixed $content
     *
     * @return string
     */
    protected function encode($content)
    {
        $statusCode = $this->response->getStatusCode();
        if($statusCode >= 400 && $statusCode < 500 ) {
            if($this->request->getContent()) {
                $content['payload'] = $this->request->all() ?: (json_decode(utf8_encode($this->request->getContent()), true)  ?: "Invalid json format !!");
            }
        }

        return parent::encode($content);
    }
}