terraform {
  backend "s3" {
    bucket = "examendespliegue-terraform-alejandropolo"
    key    = "symfony/terraform.tfstate"
    region = "us-east-1"
    encrypt = true
  }
}