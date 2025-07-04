<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class Test extends Controller
{
	public function index(Request $request)
	{
	//Permission::create(['name'=>'View Students']);
	//Permission::create(['name'=>'Add Student']);
	//Permission::create(['name'=>'Edit Student']);
	//Permission::create(['name'=>'Delete Student']);
	//Permission::create(['name'=>'View Audit Trail']);
        //Permission::create(['name'=>'Edit User']);
        //Permission::create(['name'=>'Delete User']);
        //Permission::create(['name'=>'View Users']);

	echo config("test.name");
	/*
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST', '127.0.0.1');
        $backupPath = storage_path('app/backups');
        $filename = "backup_" . Carbon::now()->format('Y-m-d_H-i-s') . ".sql";
	
        if (!file_exists($backupPath)) {
            mkdir($backupPath, 0755, true);
        }
	
        $command = "mysqldump -u ".$username." -p".$password." ".$database." > ".$backupPath."/".$filename;
	echo "Username: ".config('database.mysql.DB_USERNAME');
	echo "<br>".$command;
	$process = Process::fromShellCommandline($command);

        try {
            $process->mustRun();
            Log::info("Database backup successful: {$filename}");
	    echo "Database backup successful: ".$filename;
        } catch (ProcessFailedException $exception) {
            Log::error("Database backup failed: " . $exception->getMessage());
        }

	$bookingService=new BookingService();
	$boardroom = "DVC (A&F) BOARDROOM 3RD FLOOR"; // ID of the boardroom to check
	$date="2025-03-17";
	$startTime = '09:00:00'; // Start time of the new booking
	$stopTime = '11:00:00'; // End time of the new booking
	$boardroomStatus=$bookingService->isBoardRoomBooked($boardroom,$date,$startTime,$stopTime);
	//echo "Boardroom Status is booked ".count($boardroomStatus) ."times<br><br>";
	//print_r($boardroomStatus);
	
	if ($bookingService->isBoardRoomBooked($boardroom,$date,$startTime,$stopTime))
	{
	echo $boardroom." is already booked on ".Carbon::parse($date)->format("F jS Y")." between ".Carbon::parse($startTime)->format("h:i A")." and ".Carbon::parse($stopTime)->format("h:i A");
   	}
	else
	{
	echo "Boardroom is available";
	}
	

    date_default_timezone_set('Africa/Nairobi');
//Bookings::isBoardRoomBooked("DVC ACAD BOARDROOM 1ST FLOOR","2025-03-17","9:00 AM","11:50 AM");

  if(Bookings::isBoardRoomBooked("DVC ACAD BOARDROOM 1ST FLOOR","2025-03-17","9:00 AM","11:50 AM"))
   {
	echo "Boardroom is booked between 9:00 AM and 8:50 AM";
   }
else
	{
	echo "Boardroom is available";
	}
*/
/*
$user_permissions="Edit Booking,Delete Booking,View Bookings,Add User,Edit User,Delete User,View Users";
$user_permissions=str_replace(",","\",\"",$user_permissions);
$array=explode(",",str_replace(",","\",\"","Edit Booking,Delete Booking,View Bookings,Add User,Edit User,Delete User,View Users"));
print_r($array);

$url="users/eyjpdii6imi1mef0cthumdztk081smvqoejseue9psisinzhbhvlijoidmdknll5ukppvgyxsvqzckrhvmjwut09iiwibwfjijoinjvkm2njzgmzndm4ndyxodfhndm2ytg4zjk1ngjhzwzhzjm0oti4zta4mjayzje5zda1mwi2ntblywi4n2ixziisinrhzyi6iij9/edit";
echo "Substr is ".substr(strtolower($url), 0, 5);
$new_url="bookings/eyjpdii6imi1y05yqwn6thbimxy2wldvqutlbgc9psisinzhbhvlijoiq0pov3nybitqbvfydghmnho1oekzqt09iiwibwfjijoinwflownjm2m2mgqyyjmymzqzywrkmtazymeynzfjntvinzgxogjkymnmntzim2e4odu2yti5n2nmm2qymzbjzsisinrhzyi6iij9/edit";
echo "<br>Substr is ".substr(strtolower($new_url), 0, 8);


$user_permissions="Edit Booking,Delete Booking,View Bookings,Add User,Edit User,Delete User,View Users";
$user_permissions=str_replace(",","\",\"",$user_permissions);
$array=explode(",",$user_permissions);
print_r($user_permissions);
	
	$visitor_ip_address="192.168.2.176";
	echo "Location is ".Location::get($visitor_ip_address)->countryName;
	print_r(Location::get($visitor_ip_address));

	
	$emailService = new EmailService();
	$success = $emailService->sendEmail(
	    'mwangi.nicholas@ku.ac.ke',
	    'New Booking Received(Test)',
	    '<p>A new booking has been made. Please check the admin panel.</p>'
	);

	if ($success) {
	    return 'Email sent successfully';
	} else {
	    return 'Failed to send email';
	}
        
        Permission::create(['name'=>'Add Building']);
        Permission::create(['name'=>'Edit Building']);
        Permission::create(['name'=>'Delete Building']);
        Permission::create(['name'=>'View Buildings']);
        
        $user=@Auth::user();
        //$user->revokePermissionsTo("View Bookings");
        //echo "Permissions assigned include ".$user->getDirectPermissions();

        //$user->revokePermissionTo(["Add Booking","Edit Booking","View Bookings","Add User","Edit User","Delete User","View Users"]);

        echo "<br><br>Permissions assigned include ".$user->getDirectPermissions();
        if($user->hasPermissionTo("View Bookings"))
        {
        echo "User can view bookings. ".$user->hasPermissionTo("View Bookings");
        }
        else
        {
            echo "User cannot view bookings. ".$user->hasPermissionTo("View Bookings");
        }
        echo url("/");
        echo "<br><br>Current Route: ".url()->current();
        echo "<br><br>".Str::replace(url("/")."/","",url()->current());
        //$url="Google/auth/callback?authuser=1&code=4%2f0asvgi3i3ccskkk0o9iqicekk9d2mqhfyldr5s70eu5eh6vcznve3rjs4r7osf0cy53jf-g&hd=ku.ac.ke&prompt=none&scope=email%20profile%20https%3a%2f%2fwww.googleapis.com%2fauth%2fuserinfo.email%20https%3a%2f%2fwww.googleapis.com%2fauth%2fuserinfo.profile%20openid&state=scgm1tfmr0svwn6lkgjar6mx2htzhqlv4kkn6mgg";
        $url="Google\/auth\/redirect";
        if(Str::contains($url,"Google\/auth\/"))
        {
            echo "<br>COntains Google Auth";
        }
        else
        {
            echo "<br>Google does not contain Google Auth";
        }
        //return view("landing");
        //$visitor_ip_address="192.168.2.172";
        //$visitor_ip_address="41.89.10.241";
        //$country=Location::get($visitor_ip_address);
        //var_dump($country);
        //if($country)
        //{
        //echo "<br>Country is ".$country->countryName;
        //echo "<br>City is ".$country->cityName;
        //}
        /*
        $statusCounter = Booking::select('status', \DB::raw('count(*) as count'))
        ->groupBy('status')
        ->get();

// Convert the results to an associative array for JSON response
$statusCountArray = [];
$all=0;
$statusCountArray["All"]=$all;
$statusCountArray["confirmed"]=0;
$statusCountArray["Unconfirmed"]=0;

foreach ($statusCounter as $statusCount) {
$all+=$statusCount->count;
$statusCountArray[ucwords($statusCount->status)] = $statusCount->count;
}

$statusCountArray["All"]=$all;
$count=json_encode($statusCountArray);
echo json_decode($count->All);

        echo config("app.name");
        $meeting_name="Boardroom Demo Date";
        $date_of_the_meeting="2025-02-07";
        $start_time="10:30 AM";
        $record_exists=Booking::where("meeting_name", $meeting_name) 
                                ->where("date",$date_of_the_meeting)
                                ->where("start_time",$start_time)->first();
        if($record_exists)	
        {
            echo "<br>Booking exists";
        }
        else
        {
            echo "<br>Booking does not exist";
        }
        echo "Date_format: ".date_format(date_create($start_time),"h:m A");
        */

	}
}
