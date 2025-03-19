<?php

/**
 * Make a SELECT query and return an array with all records
 *
 * @param string $sql
 * @return array
 */
function queryGetAll(string $sql)
{
    global $pdo;

    try {

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        die($e->getMessage());
    }
}

/**
 * Make a SELECT query and return the first row if exists
 *
 * @param string $sql
 * @return array
 */
function queryGet(string $sql)
{
    global $pdo;

    try {

        $result = queryGetAll($sql);

        return $result[0] ?? null;
    } catch (PDOException $e) {

        die($e->getMessage());
    }
}

/**
 * Check if login exists
 *
 * @param string $email
 * @return array
 * @throws Exception
 */
function queryGetLogin(string $email)
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([
            ':email' => $email,
        ]);

        // returns array if Email is found, else false
        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

/**
 * INSERT Robot Query
 *
 * @param string $sql_insertRobot
 * @param array $robot
 * @return bool
 */
function queryInsertRobot(string $sql_insertRobot, array $robot)
{
    global $pdo;

    try {

        return $pdo->prepare($sql_insertRobot)
            ->execute([
                ':manufacturerID' => $robot['manufacturerID'],
                ':name' => $robot['name'],
                ':type' => $robot['robotType'],
                ':serialNumber' => $robot['serialNumber'],
                ':x_coordinate' => $robot['x_coordinate'],
                ':y_coordinate' => $robot['y_coordinate'],
                ':color' => $robot['color'],
                ':material' => $robot['material'],
            ]);

    } catch (PDOException $e) {

        die($e->getMessage());
    }
}

function queryCheckUsername(string $username)
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute([
            ':username' => $username,
        ]);

        //  returns array if Username is found, else false
        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}


/**
 * INSER User Query
 *
 * @param array $user
 * @return void
 */
function queryInsertUser(array $user){
    global $pdo;

    try{
        $stmt = $pdo->prepare("INSERT INTO users (email, password, username) VALUES (:email, :password, :username) ");
        $stmt->execute([
            ':email' => $user['email'],
            ':password' => $user['password'],
            ':username' => $user['username'],
        ]);
    }  catch (PDOException $e) {

        die($e->getMessage());
    }
}


/**
 * UPDATE Query
 *
 * @param string $sql_updateRobot
 * @param array $robot
 * @param int $robotID
 * @return bool|void
 */
function queryUpdate(string $sql_updateRobot, array $robot, int $robotID)
{
    global $pdo;

    try {
        return $pdo->prepare($sql_updateRobot)
            ->execute([
                ':manufacturerID' => $robot['manufacturerID'],
                ':name' => $robot['name'],
                ':type' => $robot['robotType'],
                ':serialNumber' => $robot['serialNumber'],
                ':x_coordinate' => $robot['x_coordinate'],
                ':y_coordinate' => $robot['y_coordinate'],
                ':color' => $robot['color'],
                ':material' => $robot['material'],
                ':robotID' => $robotID
            ]);

    } catch (PDOException $e) {

        die($e->getMessage());
    }
}


/**
 * DELETE Query
 *
 * @param string $sql_deleteRobot
 * @param mixed $robot
 * @return bool
 */
function queryDelete(string $sql_deleteRobot, int $robotID)
{
    global $pdo;
    try {

        return $pdo->prepare($sql_deleteRobot)
            ->execute([
                ':robotID' => $robotID
            ]);

    } catch (PDOException $e) {

        die($e->getMessage());
    }
}


/**
 * Upload Picture Query
 *
 * @param string $sql_uploadRobot
 * @param $robotImg
 * @param int $robotID
 * @return mixed
 */
function queryUploadImg(string $sql_uploadRobotImg, $robotImg, int $robotID)
{
    global $pdo;
    try {

        return $pdo->prepare($sql_uploadRobotImg)
            ->execute([
                ':robotID' => $robotID,
                ':robotImg' => $robotImg,
            ]);

    } catch (PDOException $e) {

        die($e->getMessage());
    }
}


/**
 * Upload Picture only short path in DB
 *
 * @param string $sql_uploadRobotImgPath
 * @param string $robotImgPath
 * @param int $robotID
 * @return void
 */
function queryUploadImgPath(string $sql_uploadRobotImgPath, string $robotImgPath, int $robotID): void
{
    global $pdo;
    try {
        $stmt = $pdo->prepare($sql_uploadRobotImgPath);
        $stmt->bindParam(':robotID', $robotID, PDO::PARAM_INT);
        $stmt->bindParam(':robotImgPath', $robotImgPath, PDO::PARAM_LOB);
        $stmt->execute([
            ':robotID' => $robotID,
            ':robotImg' => $robotImgPath,
        ]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}