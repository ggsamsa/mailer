#!/bin/bash
# CHANGE THESE VALUES
subject="subject"
from="Renato Lopes <renato@renato.com>"
html="body.html"
emails="contacts.txt"
#

send_email()
{
	if [ -z "$1" ]; then
		echo "Error: an email address must be provided"
	fi
	export MAILTO=$1
	export CONTENT=$html
	(
		echo "From: "$from
		echo "To: "$1
		echo "MIME-Version: 1.0"
		echo "Subject: "$subject
		echo "Content-Type: text/html"
		echo "Content-Disposition: inline"
		cat $CONTENT
	) | /usr/sbin/sendmail -t $MAILTO
}

for i in `cat $emails`
do
	send_email $i
	echo "email sent to $i"
done
