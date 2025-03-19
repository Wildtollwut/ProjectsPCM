<?php

/**
 * Make a SELECT query and return an array
 *
 * @param string $sql
 * @return array
 */
function queryGet(string $sql)
{
    global $pdo;

    try {

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        die($e->getMessage());
    }
}

/**
 * INSERT Query
 *
 * @param string $sql_insertRobot
 * @param array $robot
 * @return bool
 */
function queryInsert(string $sql_insertRobot, array $robot)
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

/**
 * UPDATE Query
 *
 * @param string $sql_updateRobot
 * @param array $robot
 * @return bool
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
 * @param string $sql_uploadRobotImgPath
 * @param string $robotImgPath
 * @param int $robotID
 * @return void
 */
function queryUploadImgPath(string $sql_uploadRobotImgPath, string $robotImgPath, int $robotID){
    global $pdo;
    try{
        $stmt = $pdo->prepare($sql_uploadRobotImgPath);
        $stmt->bindParam(':robotID', $robotID, PDO::PARAM_INT);
        $stmt->bindParam(':robotImgPath', $robotImgPath, PDO::PARAM_LOB);
        $stmt->execute([
            ':robotID' => $robotID,
            ':robotImg' => $robotImgPath,
        ]);
    }catch(PDOException $e){
        die($e->getMessage());
    }
}