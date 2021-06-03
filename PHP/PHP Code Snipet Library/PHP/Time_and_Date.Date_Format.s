<?php
/*     December 2002 / January 2003
ISOWk  M   Tu  W   Thu F   Sa  Su
----- ----------------------------
51     16  17  18  19  20  21  22 
52     23  24  25  26  27  28  29
1      30  31   1   2   3   4   5
2       6   7   8   9  10  11  12
3      13  14  15  16  17  18  19   */

// Outputs: 12/28/2002 - %V,%G,%Y = 52,2002,2002
print "12/28/2002 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("12/28/2002")) . "n";

// Outputs: 12/30/2002 - %V,%G,%Y = 1,2003,2002
print "12/30/2002 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("12/30/2002")) . "n";

// Outputs: 1/3/2003 - %V,%G,%Y = 1,2003,2003
print "1/3/2003 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("1/3/2003")) . "n";

// Outputs: 1/10/2003 - %V,%G,%Y = 2,2003,2003
print "1/10/2003 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("1/10/2003")) . "n";



/*     December 2004 / January 2005
ISOWk  M   Tu  W   Thu F   Sa  Su
----- ----------------------------
51     13  14  15  16  17  18  19
52     20  21  22  23  24  25  26
53     27  28  29  30  31   1   2
1       3   4   5   6   7   8   9
2      10  11  12  13  14  15  16   */

// Outputs: 12/23/2004 - %V,%G,%Y = 52,2004,2004
print "12/23/2004 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("12/23/2004")) . "n";

// Outputs: 12/31/2004 - %V,%G,%Y = 53,2004,2004
print "12/31/2004 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("12/31/2004")) . "n";

// Outputs: 1/2/2005 - %V,%G,%Y = 53,2004,2005
print "1/2/2005 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("1/2/2005")) . "n";

// Outputs: 1/3/2005 - %V,%G,%Y = 1,2005,2005
print "1/3/2005 - %V,%G,%Y = " . strftime("%V,%G,%Y",strtotime("1/3/2005")) . "n";

?>