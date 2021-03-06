## Most of this script exists to allow the script to elevate itself to be an administrator.  The part that adds a firewall rule
## is marked below.
##
## Self-elevating script obtained from http://stackoverflow.com/questions/7690994/powershell-running-a-command-as-administrator

$# Get the ID and security principal of the current user account
$myWindowsID = [System.Security.Principal.WindowsIdentity]::GetCurrent();
$myWindowsPrincipal = New-Object System.Security.Principal.WindowsPrincipal($myWindowsID);

# Get the security principal for the administrator role
$adminRole = [System.Security.Principal.WindowsBuiltInRole]::Administrator;

# Check to see if we are currently running as an administrator
if ($myWindowsPrincipal.IsInRole($adminRole))
{
    # We are running as an administrator, so change the title and background colour to indicate this
    $Host.UI.RawUI.WindowTitle = $myInvocation.MyCommand.Definition + "(Elevated)";
    $Host.UI.RawUI.BackgroundColor = "DarkBlue";
    Clear-Host;
}
else {
    # We are not running as an administrator, so relaunch as administrator

    # Create a new process object that starts PowerShell
    $newProcess = New-Object System.Diagnostics.ProcessStartInfo "PowerShell";

    # Specify the current script path and name as a parameter with added scope and support for scripts with spaces in it's path
    $newProcess.Arguments = "& '" + $script:MyInvocation.MyCommand.Path + "'"

    # Indicate that the process should be elevated
    $newProcess.Verb = "runas";

    # Start the new process
    [System.Diagnostics.Process]::Start($newProcess);

    # Exit from the current, unelevated, process
    Exit;
}




## The following line is the only thing that ACTUALLY does anything needed here.  The rest of the script is to elevate the script to allow
## it to actually create the firewall rule.  A standard powershell script does not have the authority to create firewall exceptions.
New-NetFirewallRule -DisplayName "Website - TCP Port 80" -Direction Inbound -Enabled True -Protocol TCP -LocalPort 80 -Action Allow -profile Any -Name DigiGirlsHTTPInboundAllow





Write-Host -NoNewLine "Press any key to continue...";
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown");

