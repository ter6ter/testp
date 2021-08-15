<?php
class User {
    /**
     * @var int
     */
	public $id;

    /**
     * @var string
     */
	public $login;

    /**
     * @var int
     */
    public $last_login;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var float
     */
    public $balance = 0;

    /**
     * @param int $id
     * @return User
     */
    public static function get(int $id)
    {
        $data = MyDB::query("SELECT * FROM user WHERE id = ?id", ['id' => $id], 'row');
        if ($data) {
            return new User($data);
        } else {
            return false;
        }
    }

    /**
     * @param string $login
     * @param string $password
     * @return false|User
     * @throws Exception
     */
	public static function login(string $login, string $password)
    {
        $password_hash = md5($password.PASSWORD_SALT);
        $data = MyDB::query("SELECT * FROM user WHERE login = '?login' AND password = '?password'",
            ['login' => $login, 'password' => $password_hash], 'row');
        if ($data) {
            $_SESSION['uid'] = $data['id'];
            $data['last_login'] = date('Y-m-d H:i:s');
            MyDB::update('user', ['last_login' => $data['last_login']], $data['id']);
            return new User($data);
        } else {
            return false;
        }
    }

    /**
     * @param string $login
     * @param string $password
     * @return User
     */
    public static function register(string $login, string $password)
    {
        if (MyDB::query("SELECT id FROM user WHERE login = '?login'",
            ['login' => $login], 'num_rows')) {
            return false;
        }
        $data['login'] = $login;
        $data['password'] = md5($password.PASSWORD_SALT);;
        $data['last_login'] = date('Y-m-d H:i:s', 1);
        $data['name'] = 'Иван Иванович';
        $data['email'] = 'test@test.ru';
        $data['id'] = MyDB::insert('user', $data);
        $user = new User($data);
        return $user;
    }

    /**
     * @param array $data
     */
	public function __construct(array $data)
    {
        foreach (['login', 'name', 'email', 'balance'] as $field) {
            if (isset($data[$field])) {
                $this->$field = $data[$field];
            }
        }
        $this->last_login = strtotime($data['last_login']);
	}
}