<?php
  include("../forms/db_login.php");
  if ($_POST) {
    switch($_POST['type']) {
      case "pen_app":
        $stmt = $pdo->prepare("INSERT INTO `walrus-reviews` (`name`, `review`, `rating`, `email`, `date_updated`) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($_POST['name'], $_POST['review'], $_POST['rating'], $_POST['email'], $_POST['date']));
        $stmt = $pdo->prepare("DELETE FROM `pending-reviews` WHERE `id` = ?");
        $stmt->execute([$_POST['id']]);
        echo "Approval Successful.";
        break;
      case "pen_del":
        $stmt = $pdo->prepare("DELETE FROM `pending-reviews` WHERE `id` = ?");
        $stmt->execute([$_POST['id']]);
        echo "Delete Successful.";
        break;
      case "app_del":
        $stmt = $pdo->prepare("DELETE FROM `walrus-reviews` WHERE `id` = ?");
        $stmt->execute([$_POST['id']]);
        echo "Delete Successful.";
        break;
      case "pen_edit":
        $stmt = $pdo->prepare("UPDATE `pending-reviews` SET `name` = ?, `review` = ?, `rating` = ?, `email` = ?, `date_updated` = ? WHERE `id` = ?");
        $stmt->execute(array($_POST['name'], $_POST['review'], $_POST['rating'], $_POST['email'], $_POST['date'], $_POST['id']));
        echo "Edit Successful.";
      default:
        echo "No Action Taken.";
        break;
    }
  } else {
    echo "Error 500, method not approved.";
  }
?>
