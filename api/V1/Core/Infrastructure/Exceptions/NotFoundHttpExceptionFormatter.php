<?php

namespace Api\V1\Core\Infrastructure\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Optimus\Heimdal\Formatters\BaseFormatter;

class NotFoundHttpExceptionFormatter extends BaseFormatter
{

    protected function format(JsonResponse $response, Exception $e, array $reporterResponses)
    {
        dd("ok");
        $response->setStatusCode(404);
        $data = $response->getData(true);

        if ($this->debug) {
            $data = array_merge($data, [
                'code'   => $e->getCode(),
                'message'   => $e->getMessage(),
                'exception' => (string) $e,
                'line'   => $e->getLine(),
                'file'   => $e->getFile()
            ]);
        } else {
            $data['message'] = [
                'message' => 'The resource was not found.',
                'log_id' => $reporterResponses['sentry']['sentry_id']
            ];
        }

        $response->setData($data);
    }
}