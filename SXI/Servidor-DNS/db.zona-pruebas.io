$TTL    1d ; default expiration time (in seconds) of all RRs without their own TTL value
@       IN      SOA     javi.com root.javi.com (
                  3      ; Serial
                  1d     ; Refresh
                  1h     ; Retry
                  1w     ; Expire
                  1h )   ; Negative Cache TTL

; name servers - NS records
     IN      NS      ns1.zona-pruebas.io.

; name servers - A records
ns1.zona-puebas.io.             IN      A      172.24.0.2
www.javi.com                     IN      A      172.24.0.3