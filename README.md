# 简介   
Telegram 上的类似 ask.fm 的提问 / 留言板。  
可以选择公开或私密 🍓   

\*更新：后台完全匿名。  

乃们有想对我说的话/提问吗：      
http://t.me/ask_mayo_bot   

# 部署一个

运行环境：PHP + Nginx / Apache  
需要 HTTPS。  
可以是虚拟主机。   

## 创建 Bot

在 Telegram 上找 @botfather 创建一个，修改好 ID、昵称、头像、BIO 等，再复制好 API Token。    

## 创建频道

用于 Bot 自动发送公共留言。   
需要在频道->成员->管理员（手机版才能看到），输入 Bot 的 ID，查找后添加成管理员，才有发文权限。    

## 部署代码   

$ git clone https://github.com/mayocream/ask_mayo_bot    
$ cd ask_mayo_bot  

修改目录下 `config.example` 文件，并重命名为 `config`  
（若有空格需要添加引号 `"`）      

BOT_API_TOKEN 填写 Telegram Bot Api Token       
MASTER_NAME 填写 你的昵称，替换“真夜”    
MASTER_USER_ID 在 Telegram @ask_mayo_bot 对话窗输入 /user_id，把返回的数字填进去    
CHANNAL_ID 频道 ID，格式是 @ask_mayo，注意带 at 符号    

\*更新增加修改文字部分。  

用 Git 或 FTP 上传到服务器。  
（推荐使用 Heorkuapp 比较方便）  

部署有问题可以联系我。  

## 设置 Webhook

直接用浏览器访问    
`https://api.telegram.org/bot<API_Token>/setWebhook?url=https://<Your_Domain>/public/web.php`  

`<API_Token>` 替换为 Bot Api Token。  
`<Your_Domain>` 替换成你的域名。  

访问后会返回 Json 提示已设置。   
