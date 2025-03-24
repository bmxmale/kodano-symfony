# Projekt PHP z ApiPlatform

## Wymagania

- [DDEV](https://ddev.readthedocs.io/en/stable/#installation)


## Instalacja

1. Sklonuj repozytorium:

    ```bash
    git clone git@github.com:bmxmale/kodano-symfony.git
    cd kodano-symfony
    ```

2. Uruchom DDEV:

    ```bash
    ddev start
    ```

3. Zainstaluj zależności przy pomocy Composer:

    ```bash
    ddev composer install
    ```

4. Wykonaj migracje bazy danych:

    ```bash
    ddev exec composer db:migrate
    ```

## Uruchamianie projektu

1. Uruchom serwer deweloperski:

    ```bash
    ddev start
    ```

2. Projekt będzie dostępny pod adresem: [https://kodano-symfony.ddev.site/api](https://kodano-symfony.ddev.site/api)


## Testy:

Aby uruchomić testy jednostkowe za pomocą PHPUnit, wykonaj następujące kroki:

```bash
ddev exec composer test:run
```

## Mailpit

Mailpit jest dostępny pod adresem: [https://kodano-symfony.ddev.site:8026](https://kodano-symfony.ddev.site:8026)

## Powiadomienia

Po zapisie produktu wywoływane są powiadomienia, które są obsługiwane przez `NotificationManager`. Powiadomienia mogą być wysyłane za pomocą różnych kanałów, takich jak logi (`LogNotification`) oraz e-mail (`EmailNotification`).