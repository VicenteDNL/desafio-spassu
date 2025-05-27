FROM node:22

WORKDIR /var/www/
COPY . .
RUN npm install
CMD ["sh", "-c", "npm install && npm run dev"]