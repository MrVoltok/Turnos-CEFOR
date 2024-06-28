@echo off
:: Get the local IP address using PowerShell
for /f "tokens=*" %%i in ('powershell -Command "([System.Net.Dns]::GetHostAddresses([System.Net.Dns]::GetHostName()) | where { $_.AddressFamily -eq 'InterNetwork' }).IPAddressToString"') do set LOCAL_IP=%%i

:: Echo the IP address (optional, for debugging)
echo Local IP Address: %LOCAL_IP%

:: Start Laravel development server
start "Laravel Server" cmd /k "php artisan serve --host=%LOCAL_IP% --port=8000"

:: Start npm development server
start "NPM Server" cmd /k "npm run dev"
