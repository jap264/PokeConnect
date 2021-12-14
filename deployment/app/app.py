#!/usr/bin/env python
import sys, json

def main(argv):
    type = str(argv[1])
    if (type == 'Install'):
        # Initialize      
        pass        
    elif (type == 'Fail'):
        return "{'Not Available' : -1}"
    elif (type == 'Rollback'):
        return "{'Not Available' : -1}"
    elif (type == 'Create'):
        # Grab files in other computer

        # pacakage those files together

        # create track for pacakage in mysql

        # maybe have json file for track packages too
        
        return "{'Not Available' : -1}"

if __name__ == "__main__":
   string = main(sys.argv)
   print(string)