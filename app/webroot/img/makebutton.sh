if [ $# -ne 2 ]; then
  echo "Usage: `basename $0` buttontext file"
else
  wget -q -O $2 "http://dabuttonfactory.com/b.png?t=$1&f=Calibri-Bold&ts=16&tc=ffffff&tshs=1&tshc=222222&it=png&c=10&bgt=gradient&bgc=808080&ebgc=000000&be=on&hp=20&vp=11"
fi
