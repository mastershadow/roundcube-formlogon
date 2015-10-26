# roundcube-formlogon
Login posting data via form POST in roundcube

## Fixing CSRF after the first login

Open **program/lib/Roundcube/rcube.php**

Find
```php
public function check_request($mode = rcube_utils::INPUT_POST)
```

Add
```php
if ($_POST['_autologin'] == 1) {
        return true;
}
```
