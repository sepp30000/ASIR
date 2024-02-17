# Tarea Final

En esta tarea vamos a realizar una tarea que se ejecute en un nodo y conforme un script a ejecutar en el servidor. Después de esto se conformará un informe en formato pdf y se notificará el funcionamiento.

[Repositorio](https://github.com/sepp30000/IAW_Final/tree/main)

## Preparación del entorno 

Usaremos una instancia de **AWS** como servidor ("servjenkins.duckdns.org"). Aquí montaremos toda la estructura previa de usuarios para poder ejecutar el *meta-script*

![alt image](Capturas/1usuarios.png)

Después de esto, otra instancia de **AWS** será la que actuará como nodo (jenkinsasir.duckdns.org) en el que se realizarán las tareas de jenkins.

![alt image](Capturas/2Nodos.png)

Para acabar crearemos un repositorio donde tendremos todos los archivos necesario (Excels, Scripts, Jenkinsfile ....)

![alt image](Capturas/3Repositorio.png)

Con esto ya tendriamos preparado el entorno para realizar las tareas.

## Tareas

### Tarea 1: Recoger el repositorio

Lo primero que haremos será recoger este repositorio. Así que crearemos un job con pipelines que usará como nodo nuestra instancia de **AWS**
y recoja nuestro repositorio de *GITHUB*.

![alt image](Capturas/1.png)

### Tarea 2: Ejecutamos el siguiente jenkinsfile

```bash
pipeline {
    agent {
        node {
            label 'AWS_NODO'
        }
    }
    environment {
        git = credentials('token')
    }
    stages {
        stage('Paso 1: Clonar') {
            steps {
                echo 'Clonando repositorio...'
                //sh 'curl -X POST -H "Content-Type: application/json" -d "{\"chat_id\": \"881875692\", \"text\": \"Falló la tarea $JOB_NAME!!, ejecución $BUILD_NUMBER, \", \"disable_notification\": false}" https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
                sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "Repo!!!", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
                // Enviar documento (Funciona)
                // sh 'curl -X  POST "https://api.telegram.org/bot"6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ"/sendDocument" -F chat_id="881875692" -F document="@new.xlsx"'
            }
        }
        stage('Paso 2: Ejecutar script de python') {
            steps {
                echo 'Ejecutando script de python...'
                sh '/usr/bin/python3 python-diff-v2.py old.xlsx new.xlsx'
                sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "Script!!!", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
            }
        }
        stage('Paso 3: Script al servidor') {
            steps {
                echo 'Mandando el sh al servidor...'
                // Cambiar el script chorra por el meta-script
                sh 'scp -i ~/puto.pem -p /home/ubuntu/workspace/A_la_primera/meta-script.sh  ubuntu@servjenkins.duckdns.org:/home/ubuntu/meta-script.sh'
                sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "Mandado!!!", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
            }
        }
        stage('Paso 4: Ejecutar script de bash') {
            steps {
                echo 'Ejecutando script de bash...'
                // ssh para ejecutar
                sh 'ssh -i ~/puto.pem ubuntu@servjenkins.duckdns.org "sh meta-script.sh"'
                sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "Ejecutado!!!", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
            }
        }
        stage('Paso 5: Creación de informe') {
            steps {
                echo 'Conformando PDF...'
                sh '/usr/bin/python3 md2pdf.py info.md info.pdf'
                sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "PDF!!!", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
            }
        }
        stage('Paso 6: Enviando PDF') {
            steps {
                echo 'Enviando...'
                sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "Enviado!!!", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
                sh 'curl -X  POST "https://api.telegram.org/bot"6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ"/sendDocument" -F chat_id="881875692" -F document="@info.pdf"'
            }
        }
        stage('Paso 7: Push a github') {
            steps {
                echo 'Haciendo un push a github...'
                sh 'git config --global user.email \'peris30000@gmail.com\''
                    sh 'git config --global user.name \'sepp30000\''
                    sh 'git add info.md info.pdf'
                    sh 'git commit -m "Arriba"'
                    withCredentials([usernamePassword(credentialsId: 'tokengit', passwordVariable: 'GIT_PASSWORD', usernameVariable: 'GIT_USERNAME')]) {
                        sh('git push https://${GIT_USERNAME}:${GIT_PASSWORD}@github.com/sepp30000/IAW_Final.git HEAD:main')
                sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "Github!!!", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
            }
        }
        stage('Paso 8: Notificando') {
            steps {
                echo 'Notificando...'
                sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "Terminado!!!", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
            }
        }
    }
post {
    success {
        script {
            sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "Tarea terminada correctamente", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
        }
    }
    failure {
        //Lo intenté pero no salió
        //sh "cat ${JENKINS_HOME}/jobs/${JOB_NAME}/builds/${BUILD_NUMBER}/log >> log.txt"
        sh 'curl -X POST -H \'Content-Type: application/json\' -d \'{"chat_id": "881875692", "text": "Terminado de manera erronea!!!", "disable_notification": false}\'  https://api.telegram.org/bot6791917046:AAHuW0hZOl5D5raRyx1R11MWY7fIYHi66xQ/sendMessage'
    }
}
}
```

### Tarea 3: Funciona la tarea

Después de decenas de pruebas el jenkins funciona

![alt image](Capturas/4.png)

Cambia los usuarios 

![alt image](Capturas/5.png)

Y subido a GitHub

![alt image](Capturas/6.png)