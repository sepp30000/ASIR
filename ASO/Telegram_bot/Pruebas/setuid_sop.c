//

#include <unistd.h>


int main (int argc, const char * argv[]) {
    setuid(0);
    execv("./startservice.sh", NULL);
    return 0;
}