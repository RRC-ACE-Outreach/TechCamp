get-netadapter | where status -like "Up" |get-netipaddress | ? addressfamily -eq 'IPv4' | format-table interfacealias,ipaddress -autosize
pause