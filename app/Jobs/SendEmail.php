<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $email;
    protected string $subject;
    protected string $body;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $subject, $body)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $url = 'https://api.sendgrid.com/v3/mail/send';
        $data = [
            'personalizations' => [
                [
                    'to' => [
                        ['email' => $this->email]
                    ]
                ]
            ],
            'from' => [
                'email' => 'noreply@basis.org.bd',
                'name' => 'BASIS'
            ],
            'subject' => $this->subject,
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $this->body
                ]
            ]
        ];

        $headers = [
            'Authorization: Bearer ' . env('SENDGRID_KEY'),
            'Content-Type: application/json',
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        try {
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            $resp = [
                'status' => $httpCode,
                'body' => $response
            ];
            return response()->json($resp);
        } catch (\Exception $e) {
            Log::error('Error sending email:', ['message' => $e->getMessage()]);
        } finally {
            curl_close($ch);
        }
    }
}
