#!/bin/bash



filename="k.txt"

n=$(cat $filename | wc -l)
car_n=0
cat_n=0
dog_n=0
truck_n=0

cat << _EOF_
<!doctype html>
<html>
<head>
<title>
Photos
</title>
</head>
<header>

</header>
<body>
<p>Your requested queries are:</p>
<table border="2">

_EOF_

while read -r line
do
    name="$line"
#echo "<tr><th>car</th><th>cat</th><th>dog</th><th>truck</th>
if echo "$line" | grep -q "car"; then
((car_n=car_n+1)) 
if [ $car_n -eq 1 ] 
then 
echo "<tr><td><b>CAR</b></td>"
fi
echo "<td> <img src=\"$line\" style=\"width100px;height:60px;\"></td>"
fi

if echo "$line" | grep -q "cat"; then
((cat_n=cat_n+1))
if [ $cat_n -eq 1 ] 
then 
echo "</tr><tr><td><b>CAT</b></td>"
fi
echo "<td> <img src=\"$line\" style=\"width100px;height:60px;\"></td>"

fi

if echo "$line" | grep -q "dog"; then
((dog_n=dog_n+1))
if [ $dog_n -eq 1 ] 
then 
echo "</tr><tr><td><b>DOG</b></td>"
fi
echo "<td><img src=\"$line\" style=\"width100px;height:60px;\"></td>"


fi

if echo "$line" | grep -q "truck"; then
((truck_n=truck_n+1))
if [ $truck_n -eq 1 ] 
then 
echo "</tr><tr><td><b>TRUCK</b></td>"
fi
echo "<td><img src=\"$line\" style=\"width100px;height:60px;\"></td>"

fi

done < "$filename"

echo "</tr>"

echo "</table>"
echo "</body>"
echo "</html>"





