<style>
th {
    text-align: center;
}

.themmoi a {
    text-decoration: none;
    font-size: 12px;
}

.themmoi a:hover {
    color: white;

}

#display-floor {
    padding: 10px;
    margin: 20px;
}
</style>

<nav class="nav-right">
    <div class="aside-content">
        <div>
            <p><i class="fa-solid fa-hotel"></i> Danh sách nhân viên <span>[ KDH Hotel ]</span></p>
        </div>
    </div>
    <!-- <div class="display-floor"> -->
    <select name="floor" id="display-floor" onchange="showEmployees()">
        <option value="">-- Phân quyền chức vụ --</option>
        <option value="1">Quản trị</option>
        <option value="2">Người dùng</option>
        <option value="3">Nhân viên</option>
    </select>

    <div id="adminEmployeesList" style="display: none;margin: 10px 20px 0;">
        <!-- Admin employee list goes here -->
        <?php
        $sql = 'SELECT Emp_Email FROM emp_login';
        $nv = pdo_query($sql);
        foreach ($nv as $row) {
            echo $row['Emp_Email'];
        }
        ?>
    </div>

    <div id="userEmployeesList" style="display: none; margin: 10px 20px 0;">
        <!-- User employee list goes here -->
        <?php
        $sql = 'SELECT Username, Email FROM signup';
        $use = pdo_query($sql);
        foreach ($use as $row) {
            echo $row['Username'] . ' - ' . $row['Email'] . '<br>';
        }
        ?>

    </div>

    <div id="staffEmployeesList" style="display: none;margin: 10px 20px 0;">
        <!-- Staff employee list goes here -->
        <?php
        $sql = 'SELECT name, chucvu FROM nhanvien';
        $use = pdo_query($sql);
        foreach ($use as $row) {
            echo $row['name'] . ' - ' . $row['chucvu'] . '<br>';
        }
        ?>

    </div>
    <!-- </div> -->
    <table class="table table-striped">
        <tbody>
        </tbody>
    </table>
</nav>
<script>
function showEmployees() {
    var selectedOption = document.getElementById("display-floor").value;

    // Hide all employee lists
    document.getElementById("adminEmployeesList").style.display = "none";
    document.getElementById("userEmployeesList").style.display = "none";
    document.getElementById("staffEmployeesList").style.display = "none";

    // Show the selected employee list
    if (selectedOption === "1") {
        document.getElementById("adminEmployeesList").style.display = "block";
    } else if (selectedOption === "2") {
        document.getElementById("userEmployeesList").style.display = "block";
    } else if (selectedOption === "3") {
        document.getElementById("staffEmployeesList").style.display = "block";
    }
}
</script>