## Coolmate website project

```
Welcom to CoolMate BY Maiyone
                                       _ooOoo_
                                      o8888888o
                                      88" . "88
                                      (| -_- |)
                                      O\  =  /O
                                   ____/`---'\____
                                 .'  \\|     |//  `.
                                /  \\|||  :  |||//  \
                               /  _||||| -:- |||||-  \
                               |   | \\\  -  /// |   |
                               | \_|  ''\---/''  |   |
                               \  .-\__  `-`  ___/-. /
                             ___`. .'  /--.--\  `. . __
                          ."" '<  `.___\_<|>_/___.'  >'"".
                         | | :  `- \`.;`\ _ /`;.`/ - ` : | |
                         \  \ `-.   \_ __\ /__ _/   .-` /  /
                    ======`-.____`-.___\_____/___.-`____.-'======
                                       `=---='

                    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                              佛祖保佑           永无BUG
                             God Bless        Never Crash
```

0. Install Xampp on your system and import database if not exists
1. Install Redis server on your system

```bash
https://github.com/microsoftarchive/redis/releases
```

2. Move Backend and Config .env
   Copy file .env.example to new file .env

   ```bash
   copy .env.example .env
   ```

   Install dependencies

   ```bash
   composer install
   ```

   Generate key app

   ```bash
   php artisan key:generate
   ```

   Generate jwt secret key

   ```bash
   php artisan jwt:secret
   ```

3. Move Frontend and Config .env
   Create file .env

   ```bash
       mkdir .env
   ```

   Write in file .env

   ```bash
       NEXT_PUBLIC_API_ROOT=http://localhost:8000
   ```

   Install dependencies

   ```bash
   npm install
   ```

   Run application with development

   ```bash
   npm run dev
   ```
