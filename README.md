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

```bash
ddev exec composer test:run
```
