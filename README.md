# HiberLink
*(HiberLink will probably be translated in English, but for now most of the things are in French, sorry)*

HiberLink est un service de reduction de lien gratuit, open source, libre et respectueux de la vie privée de ses utilisateurs.
<br>Le service a été créé par l'équipe derrière [HiberFile](https://hiberfile.com).

## "API"
### `/link.php`
#### Exemple
```bash
curl --user-agent "curl" -X POST example.com/link.php --data="link=https://github.com"
```
**Tous les paramètre sont requis peu importe la librairie utilisée.**

#### Réponse
- En cas d'erreur: `erreur`.
- En cas de réussite: la réponse est le lien réduit.

### `/index.php`
#### Exemple
```bash
curl --user-agent "curl" -X POST -L example.com/index.php?IDENTIFIANT"
```
**ou**
```bash
curl --user-agent "curl" -X POST -L example.com/?IDENTIFIANT"
```
**Tous les paramètre sont requis peu importe la librairie utilisée
<br>`IDENTIFIANT` dépend a chaque requète.
<br>La réponse se trouvera dans le header `Location` ou dans la page**

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
- Editez `env.php` avec votre editeur de fichiers favorit (ex: `nano env.php`),
- `php setup.php` ou allez a la page setup à l'aide d'un navigateur (`curl` suffit par exemple),
- `rm env.example.php setup.php`.

## Testé et fonctionnel sur
- Debian 10 + Apache 2.4 + PHP 7.3
- Ubuntu 18.04 + Apache 2.4 + PHP 7.2
- Arch Linux + Apache 2.4 + PHP 7.4
