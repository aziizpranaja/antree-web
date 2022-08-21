# Install Images
FROM bitnami/laravel:9.3.4-debian-11-r1

# Set working directory
WORKDIR /home/app

# Install packages
# RUN apt-get update -y && apt-get upgrade -y

# Copy all files into working directory
COPY . .

# Expose Port
EXPOSE 8000

# Run script
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
