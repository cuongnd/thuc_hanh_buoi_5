<div class="view-user-login">
    <form action="index.php?controller=user&task=post_login" method="post">
        <table class="table table-bordered">
            <tr>
                <th>Username</th>
                <td><input type="text" class="form-control" name="user_name"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="text" class="form-control" name="password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </td>
            </tr>
        </table>
    </form>
</div>