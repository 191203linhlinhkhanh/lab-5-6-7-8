<?php
include_once('connect.php');

function addCategory($conn, $name)
{
    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function updateCategory($conn, $id, $name)
{
    $sql = "UPDATE categories SET name='$name' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
function deleteCategory($conn, $id)
{
    $sql = "DELETE FROM categories WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'add':
                if (isset($_POST['name'])) {
                    $name = $_POST['name'];
                    if (addCategory($conn, $name)) {
                        echo "Category added successfully";
                    } else {
                        echo "Error adding category";
                    }
                } else {
                    echo "Name is required";
                }
                break;
            case 'update':
                if (isset($_POST['id']) && isset($_POST['name'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    if (updateCategory($conn, $id, $name)) {
                        echo "Category updated successfully";
                    } else {
                        echo "Error updating category";
                    }
                } else {
                    echo "ID and name are required";
                }
                break;
            case 'delete':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    if (deleteCategory($conn, $id)) {
                        echo "Category deleted successfully";
                    } else {
                        echo "Error deleting category";
                    }
                } else {
                    echo "ID is required";
                }
                break;
            default:
                echo "Invalid action";
        }
    } else {
        echo "Action is required";
    }
}
?>