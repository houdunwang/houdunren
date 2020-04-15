<?php

namespace App\Http\Controllers\Common;

use AlibabaCloud\Client\Exception\ClientException;
use App\Http\Controllers\ApiController;
use App\Services\CodeService;
use App\Services\MailService;
use App\Services\SmsService;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Http\Request;

/**
 * 发送验证码
 * @package App\Http\Controllers\Common
 */
class CodeController extends ApiController
{
    public function __construct()
    {
        // $this->middleware('front');
    }

    /**
     * 发送短信验证码
     * @param Request $request
     * @param SmsService $smsService
     * @return JsonResponse
     * @throws ClientException
     * @throws Exception
     */
    public function send(Request $request, CodeService $codeService)
    {
        $type = filter_var($request->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'sms';
        $codeService->$type($request->account);
        return $this->success('验证码发送成功');
    }
}
