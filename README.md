# HiberLink
[![CodeFactor](https://www.codefactor.io/repository/github/hiberfile/hiberlink/badge)](https://www.codefactor.io/repository/github/hiberfile/hiberlink)

*(HiberLink will probably be translated in English, but for now most of the things are in French, sorry)*

HiberLink est un service de réduction de lien gratuit, open source, libre et respectueux de la vie privée de ses utilisateurs.
<br>Le service a été créé par l'équipe derrière [HiberFile](https://hiberfile.com).

## API
### Applications utilisant notre API (<3)
- [HiberLink iOS](https://github.com/GroupeMINASTE/HiberLink-iOS) et [HiberLink Android](https://github.com/GroupeMINASTE/HiberLink-Android) par le [Groupe MINASTE](https://github.com/GroupeMINASTE)
- [HiberHub Desktop](https://github.com/jusdepatate/HiberHub-Deskop) par [@jusdepatate](https://github.com/jusdepatate)
- [Hiber CLI Client](https://github.com/jusdepatate/pieces-of-code/tree/master/hiber) par [@jusdepatate](https://github.com/jusdepatate)

### `/link.php`
#### Exemple
```bash
curl --user-agent "curl" -X POST example.com/link.php --data "link=https://github.com"
```
**Tous les paramètres sont requis, peu importe la librairie utilisée.**

#### Réponse
- En cas d'erreur: `erreur`.
- En cas de réussite: la réponse est le lien réduit.

### `/index.php`
#### Exemple
```bash
curl --user-agent "curl" -X POST -L "https://hiber.link/index.php?IDENTIFIANT"
```
**ou**
```bash
curl --user-agent "curl" -X POST -L "https://hiber.link/?IDENTIFIANT"
```
**Tous les paramètres sont requis, peu importe la librairie utilisée
<br>`IDENTIFIANT` dépend a chaque requête.
<br>La réponse se trouvera dans l’header `Location` ou dans la page**

#### Réponse
- En cas d'erreur: `erreur`.
- En cas de réussite: la réponse est le lien long.


## Installation
### Pré-requis
- PHP 7.0 ou mieux,
- PHP PDO,
- Un serveur MySQL.

### Configuration guidée

- `git clone https://github.com/hiberfile/hiberlink.git`,
- `cp env.example.php env.php`,
- Éditez `env.php` avec votre éditeur de fichiers favori (ex: `nano env.php`),
- `php setup.php` ou allez à la page setup à l'aide d'un navigateur (`curl` suffit par exemple),
- `rm env.example.php setup.php`.

### Variables `env.php`
- `title` => Nom et titre du site qui sera utilisé de partout,
- `lang` => ne sert pas à grand-chose, laissez là sur `fr`,
- `ext_url` => URL externe du serveur, **doit commencer par `https://`/`http://` et ne doit pas finir par un `/`**,
- `char_per_id` => Nombre de caractères a utiliser sur chaque ID de lien générés par la suite, `8` semble être une bonne idée (98079714615416886934934209737619787751599303819750539264 soit 9*10^54 possibilitées totales),


- `matomo` => booléen qui détermine si Matomo est a utiliser sur l'instance
- `matomo_siteid` => identifiant de site sur Matomo,
- `matomo_url` => URL de Matomo **tel que fournis par matomo** (`https://`/`http://` au début et doit finir par un `/`),


- `dashboard_username` => **to be done**,
- `dashboard_password` => **to be done**,


- `mysql_address` => Adresse du serveur MySQL à utiliser,
- `mysql_port` => Port du serveur MySQL à utiliser,
- `mysql_database` => Base de donnée MySQL à utiliser,
- `mysql_username` => Nom de l'utilisateur MySQL à utiliser,
- `mysql_password` => Mot de passe de l'utilisateur MySQL à utiliser.

## Testé et fonctionnel sur
- Debian 10 + Apache 2.4 + PHP 7.3
- Ubuntu 18.04 + Apache 2.4 + PHP 7.2
- Arch Linux + Apache 2.4 + PHP 7.4
