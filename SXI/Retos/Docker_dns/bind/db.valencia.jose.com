$TTL    86400
@       IN      SOA     valencia.jose.com. root.valencia.jose.com. (
                        2023010101 ; Serial
                        3600       ; Refresco cada hora
                        1800       ; Reintento cada media hora
                        604800     ; Expira en una semana
                        86400      ; Tiempo mínimo de caché de un día
)

@       IN      NS      ns1.valencia.jose.com.
        IN      MX 10   mail.valencia.jose.com.

ns1     IN      A       192.168.1.11
mail    IN      A       192.168.1.21
