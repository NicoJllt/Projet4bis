<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;

class UserDAO extends DAO
{

    private function buildObject($row)
    {
        $user = new User();
        $user->setUserId($row['userId']);
        $user->setUsername($row['username']);
        $user->setRegistrationDate($row['registrationDate']);
        $user->setRole($row['name']);
        return $user;
    }

    public function getUsers()
    {
        $sql = 'SELECT users.userId, users.username, users.registrationDate, role.name FROM users INNER JOIN role ON users.idRole = role.roleId ORDER BY users.userId DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row) {
            $userId = $row['userId'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    public function register(Parameter $post)
    {
        $this->checkUser($post);
        $sql = 'INSERT INTO users (username, password, registrationDate, idRole) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('username'), password_hash($post->get('password'), PASSWORD_BCRYPT), 2]);
    }

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(username) FROM users WHERE username = ?';
        $result = $this->createQuery($sql, [$post->get('username')]);
        $isUnique = $result->fetchColumn();
        if ($isUnique) {
            return '<p>Le nom d\'utilisateur existe déjà.</p>';
        }
    }

    public function login(Parameter $post)
    {
        $sql = 'SELECT users.userId, users.idRole, users.password, role.name FROM users INNER JOIN role ON role.roleId = users.idRole WHERE username = ?';
        $data = $this->createQuery($sql, [$post->get('username')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }

    public function updatePassword(Parameter $post, $username)
    {
        $sql = 'UPDATE users SET password = ? WHERE username = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $username]);
    }

    public function deleteAccount($username)
    {
        $sql = 'DELETE FROM users WHERE username = ?';
        $this->createQuery($sql, [$username]);
    }

    public function deleteUser($userId)
    {
        $sql = 'DELETE FROM users WHERE userId = ?';
        $this->createQuery($sql, [$userId]);
    }
}
