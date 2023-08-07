<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
   
 /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp'; // Ubah dari 'mail' menjadi 'smtp'

    /**
     * The server path to Sendmail.
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * SMTP Server Address
     */
    public string $SMTPHost = 'smtp.gmail.com'; // Tambahkan konfigurasi SMTP

    /**
     * SMTP Username
     */
    public string $SMTPUser = 'projectwebfinal@gmail.com'; // Ganti dengan alamat email Gmail Anda

    /**
     * SMTP Password
     */
    public string $SMTPPass = 'xfgidokccqaeqmzz'; // Ganti dengan password email Gmail Anda

    /**
     * SMTP Port
     */
    public int $SMTPPort =  465 ; // Gunakan port 587 untuk TLS atau 465 untuk SSL

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 60;

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption. Either tls or ssl
     */
    public string $SMTPCrypto = 'SSL' ; // Gunakan 'tls' untuk TLS atau 'ssl' untuk SSL

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'html';

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     */
    public bool $validate = false;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;
}
