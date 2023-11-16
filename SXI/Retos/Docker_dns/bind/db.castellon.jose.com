$TTL    86400
@       IN      SOA     castellon.jose.com. root.castellon.jose.com. (
                        2023010101 ; Serial
                        3600       ; Refresco cada hora
                        1800       ; Reintento cada media hora
                        604800     ; Expira en una semana
                        86400      ; Tiempo mínimo de caché de un día
)

@       IN      NS      ns1.castellon.jose.com.
        IN      MX 10   mail.castellon.jose.com.

ns1     IN      A       192.168.1.12
mail    IN      A       192.168.1.22
