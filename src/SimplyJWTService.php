
namespace App\Services;

use ReallySimpleJWT\Token;

class JWTService
{
    /**
     * Secret key for signing the token.
     *
     * @var string
     */
    private $secret;

    /**
     * Token issuer.
     *
     * @var string
     */
    private $issuer;

    /**
     * Constructor to initialize secret and issuer.
     */
    public function __construct()
    {
        $this->secret = env('JWT_SECRET', 'sec!ReT423*&'); // Secret should come from env
        $this->issuer = 'localhost'; // Set issuer, can also come from env
    }

    /**
     * Create a JWT token.
     *
     * @param int $userId
     * @param int $expiration
     * @return string
     */
    public function createToken(int $userId, int $expiration = 3600)
    {
        $expirationTime = time() + $expiration; // Expiration time
        $token = Token::create($userId, $this->secret, $expirationTime, $this->issuer);
        return $token;
    }

    /**
     * Validate a JWT token.
     *
     * @param string $token
     * @return bool
     */
    public function validateToken(string $token): bool
    {
        return Token::validate($token, $this->secret);
    }

    /**
     * Get the decrypted payload from a JWT token.
     *
     * @param string $token
     * @return array|null
     */
    public function getPayload(string $token)
    {
        if (Token::validate($token, $this->secret)) {
            return Token::getPayload($token, $this->secret);
        }

        return null; // Invalid token
    }

    /**
     * Check if a token has expired.
     *
     * @param string $token
     * @return bool
     */
    public function isExpired(string $token): bool
    {
        return Token::isExpired($token);
    }

    /**
     * Get the user ID from the token.
     *
     * @param string $token
     * @return int|null
     */
    public function getUserId(string $token): ?int
    {
        $payload = $this->getPayload($token);
        return $payload ? $payload['user_id'] : null;
    }
}
