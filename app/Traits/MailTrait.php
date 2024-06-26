<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use SendGrid\Mail\TypeException;

trait MailTrait
{
    /**
     * @throws TypeException
     */
    protected function sendMail($to, $sub, $body, $pdfContent = null): JsonResponse
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('noreply@basis.org.bd', 'BASIS');
        $email->setSubject($sub);
        $email->addTo($to);
        $email->addContent("text/html", $body);

        // Attach the PDF content
        if ($pdfContent !== null) {
            $base64Content = base64_encode($pdfContent);
            $attachment = new \SendGrid\Mail\Attachment();
            $attachment->setContent($base64Content);
            $attachment->setType('application/pdf');
            $attachment->setFilename('Entry_Pass.pdf');
            $attachment->setDisposition('attachment');
            $attachment->setContentId('AttachmentId');
            $email->addAttachment($attachment);
        }
        $sendgrid = new \SendGrid(env('SENDGRID_KEY'));
        try {
            $response = $sendgrid->send($email);
            $resp = [
                'status' => $response->statusCode(),
                'headers' => $response->headers(),
                'body' => $response->body(),
                // 'message_id' => $response->headers('X-Message-Id')['X-Message-Id']
            ];
            return response()->json($resp);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    protected function sendMailForRegistration($to)
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom('noreply@basis.org.bd', 'BASIS');
        $email->setSubject('Expression of Interest (EoI) Successfully Submitted');
        $email->addTo($to);
        $email->addContent(
            "text/html",
            "<p>Respected Member,<br><br> Thank you for expressing your interest in becoming a member of your desired Standing Committee/Forum.<br><br>
            We will inform you of the committee list after final declaration by the EC, and the list will also be published on the BASIS website.</p>"
        );

        $sendgrid = new \SendGrid(env('SENDGRID_KEY'));
        try {
            $response = $sendgrid->send($email);
            $resp = [
                'status' => $response->statusCode(),
                'headers' => $response->headers(),
                'body' => $response->body()
            ];
            return response()->json($resp);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
