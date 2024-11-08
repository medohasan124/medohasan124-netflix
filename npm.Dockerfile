FROM node:19.3.0

# workdir of project
WORKDIR /var/www/html
ADD . /var/www/html

# Install the application dependencies
RUN npm install



# Expose a port (if your application runs on a specific port)
EXPOSE 3000
